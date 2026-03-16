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

    public function mostrarEquipo() {
        $texto = "Entrenador/a: " . $this->nombre . "<br>Equipo Pokémon:<br>";

        foreach ($this->equipo as $pokemon) {
            $texto = $texto . "- " . $pokemon->getNombre() . "<br>";
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