<?php
class Worker
{
    public string $name = "Nick";
    public string $enterprise = "ITEveryone";

    public function showObjects(): void {
        echo "Worker Object: $this->name works at $this->enterprise\n";
    }
}