<?php
class Cliente {
    private string $codigo; // FK a Persona
    private float $credito;

    public function __construct(string $codigo, float $credito) {
        $this->codigo = $codigo;
        $this->credito = $credito;
    }

    // Métodos Getter
    public function getCodigo(): string {
        return $this->codigo;
    }

    public function getCredito(): float {
        return $this->credito;
    }

    // Métodos Setter
    public function setCodigo(string $codigo): void {
        $this->codigo = $codigo;
    }

    public function setCredito(float $credito): void {
        $this->credito = $credito;
    }
}
?>
