<?php
//Clase Vehiculo  
abstract class Vehiculo
{
  protected string $marca;
  protected string $modelo;
  protected string $color;

  public function __construct(string $marca, string $modelo, string $color = "Negro")
  {
    $this->marca = $marca;
    $this->modelo = $modelo;
    $this->color = $color;
  }

  abstract public function mover();
  abstract public function detener();

  public function obtenerInformacion(): string
  {
    return "Marca: {$this->marca}, Modelo: {$this->modelo}, Color: {$this->color}";
  }

  public function __toString(): string
  {
    return $this->obtenerInformacion();
  }

  public function __get(string $name)
  {
    if (property_exists($this, $name)) {
      return $this->$name;
    }
    return null;
  }
}

//Clase Coche
class Coche extends Vehiculo
{
  private int $numeroPuertas;

  public function __construct(string $marca, string $modelo, int $numeroPuertas, string $color)
  {
    parent::__construct($marca, $modelo, $color);
    $this->numeroPuertas = $numeroPuertas;
  }

  public function mover()
  {
    return "El coche se está moviendo.";
  }

  public function detener()
  {
    return "El coche se ha detenido.";
  }

  public function obtenerInformacion(): string
  {
    return parent::obtenerInformacion() . ", Número de puertas: {$this->numeroPuertas}";
  }

  public function getNumeroPuertas(): int
  {
    return $this->numeroPuertas;
  }

  public function setNumeroPuertas(int $numeroPuertas): self
  {
    $this->numeroPuertas = $numeroPuertas;
    return $this;
  }
}


class Moto extends Vehiculo
{
  private int $cilindrada;

  public function __construct(string $marca, string $modelo, int $cilindrada, string $color)
  {
    parent::__construct($marca, $modelo, $color);
    $this->cilindrada = $cilindrada;
  }

  public function mover()
  {
    return "La moto se está moviendo.";
  }

  public function detener()
  {
    return "La moto se ha detenido.";
  }

  public function obtenerInformacion(): string
  {
    return parent::obtenerInformacion() . ", Cilindrada: {$this->cilindrada}";
  }

  public function getCilindrada(): int
  {
    return $this->cilindrada;
  }

  public function setCilindrada(int $cilindrada): self
  {
    $this->cilindrada = $cilindrada;
    return $this;
  }
}

class Camion extends Vehiculo
{
  private float $capacidad;

  public function __construct(string $marca, string $modelo, float $capacidad, string $color)
  {
    parent::__construct($marca, $modelo, $color);
    $this->capacidad = $capacidad;
  }


  public function mover()
  {
    return "El camión se está moviendo.";
  }

  public function detener()
  {
    return "El camión se ha detenido.";
  }


  public function obtenerInformacion(): string
  {
    return parent::obtenerInformacion() . ", Capacidad de carga: {$this->capacidad}t";
  }


  public function getCapacidad(): float
  {
    return $this->capacidad;
  }


  public function setCapacidad(float $capacidad): self
  {
    $this->capacidad = $capacidad;
    return $this;
  }
}


final class Bicicleta
{
  private string $marca;
  private string $modelo;

  public function __construct(string $marca, string $modelo)
  {
    $this->marca = $marca;
    $this->modelo = $modelo;
  }

  public function pedalear()
  {
    return "La bicicleta está pedaleando.";
  }

  public function obtenerInformacion(): string
  {
    return "Marca: {$this->marca}, Modelo: {$this->modelo}";
  }


  public function __toString(): string
  {
    return $this->obtenerInformacion();
  }

}

interface VehiculoElectrico
{
  public function cargarBateria();
  public function estadoBateria(): string;
}

class Tesla extends Coche implements VehiculoElectrico
{
  private int $nivelBateria;

  public function __construct(int $nivelBateria)
  {
    $this->nivelBateria = 100; // Batería llena al inicio
  }

  public function cargarBateria()
  {
    $this->nivelBateria = 100;
    return "Batería cargada";
  }

  public function estadoBateria(): string
  {
    return "Nivel de batería: {$this->nivelBateria}%";
  }

  public function obtenerInformacion(): string
  {
    return parent::obtenerInformacion() . ", " . $this->estadoBateria();
  }

}


class Concesionario
{
  public function mostrarVehiculo(Vehiculo $vehiculo)
  {
    echo $vehiculo->obtenerInformacion() . PHP_EOL;
  }
}