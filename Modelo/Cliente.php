<?php
class Cliente {
    private string $codigo; // FK a Persona
    private float $credito;
    private string $persona_codigo;

    public function __construct(string $codigo, float $credito, string $persona_codigo) {
        $this->codigo = $codigo;
        $this->credito = $credito;
        $this->persona_codigo = $persona_codigo;
    }

    // Métodos Getter
    public function getCodigo(): string {
        return $this->codigo;
    }

    public function getCredito(): float {
        return $this->credito;
    }

    public function getPersonaCodigo(): string {
        return $this->persona_codigo;
    }

    // Métodos Setter
    public function setCodigo(string $codigo): void {
        $this->codigo = $codigo;
    }

    public function setCredito(float $credito): void {
        $this->credito = $credito;
    }

    public function setPersonaCodigo(string $persona_codigo): void {
        $this->persona_codigo = $persona_codigo;
    }
}
?>
