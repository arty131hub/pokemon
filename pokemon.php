<?php
class pokemon {
    private string $nombre;
    private string $elemento;
    private string $tipo;
    private int $ataque;
    private int $nivel;
    private int $vida;

    public function __construct($nombre, $elemento, $tipo, $ataque, $nivel, $vida) {
        $this->nombre = $nombre;
        $this->elemento = $elemento;
        $this->tipo = $tipo;
        $this->ataque = (int)$ataque;
        $this->nivel = (int)$nivel;
        $this->vida = (int)$vida;
    }

    public function atacar(Pokemon $objetivo): string {
        $daño = $this->ataque + $this->nivel;
        $objetivo->recibirDanio($daño);
        return "{$this->nombre} ataca a {$objetivo->nombre} y le causa {$daño} puntos de daño.";
    }

    private function recibirDanio(int $cantidad): void {
        $this->vida -= $cantidad;
        if ($this->vida < 0) {
            $this->vida = 0;
        }
    }

    public function evolucionar(): string {
        $this->nivel += 1;
        $this->vida += 20;
        $this->ataque += 5;
        return "{$this->nombre} ha evolucionado. Nivel: {$this->nivel}, Vida: {$this->vida}, Ataque: {$this->ataque}.";
    }

    public function mostrarInfo(): string {
        return "Nombre: {$this->nombre} | Elemento: {$this->elemento} | Tipo: {$this->tipo} | Ataque: {$this->ataque} | Nivel: {$this->nivel} | Vida: {$this->vida}";
    }

    public function getNombre(): string {
        return $this->nombre;
    }
}