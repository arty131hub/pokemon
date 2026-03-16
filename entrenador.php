<?php
class entrenador {
    private string $nombre;
    /** @var Pokemon[] */
    private array $equipo = [];

    public function __construct($nombre) {
        $this->nombre = $nombre;
    }

    public function capturar(Pokemon $pokemon): void {
        $this->equipo[] = $pokemon;
    }

    public function mostrarEquipo(): string {
        if (empty($this->equipo)) {
            return "{$this->nombre} no tiene Pokémons en su equipo.";
        }
        $texto = "Entrenadora: {$this->nombre}<br>Equipo Pokémon:<br>";
        foreach ($this->equipo as $i) {
        }
        return $texto;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getEquipo(): array {
        return $this->equipo;
    }
}