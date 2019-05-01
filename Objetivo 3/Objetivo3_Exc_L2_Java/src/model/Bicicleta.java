package model;

public class Bicicleta extends Veiculo{
	private int tamanhoRoda;
	private int chassi;
	
	public int getTamanhoRoda() {
		return tamanhoRoda;
	}
	public void setTamanhoRoda(int tamanhoRoda) {
		this.tamanhoRoda = tamanhoRoda;
	}
	public int getChassi() {
		return chassi;
	}
	public void setChassi(int chassi) {
		this.chassi = chassi;
	}
	@Override
	public String toString() {
		return "Bicicleta [ Modelo= " + getModelo() + ", Marca=" + getMarca()+ ", tamanhoRoda=" + tamanhoRoda + ", chassi=" + chassi + ", NumeroDeEixos="
				+ getNumeroDeEixos() + ", Propulsao=" + getPropulsao()	+ ", AnoFabricacao=" + getAnoFabricacao() + "]";
	}
	
	
	
	
}
