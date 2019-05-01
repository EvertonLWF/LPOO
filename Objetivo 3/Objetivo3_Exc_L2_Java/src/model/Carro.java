package model;

public class Carro extends Veiculo implements Automovel {

	private int renavam;
	private int chassi;
	private String placa;
	
	@Override
	public int getRenavam() {
		return renavam;
	}

	@Override
	public void setRenavan(int renavam) {
		this.renavam = renavam;
	}

	@Override
	public int getChassi() {
		return chassi;
	}

	@Override
	public void setChassi(int chassi) {
		this.chassi = chassi;
	}

	@Override
	public String getPlaca() {
		return placa;
	}

	@Override
	public void setPlaca(String placa) {
		this.placa = placa;
	}

	@Override
	public String toString() {
		return "Carro [ Modelo=" + getModelo() 
				+ ", Marca=" + getMarca()
				+ ", AnoFabricacao=" + getAnoFabricacao()
				+ ", placa=" + placa
				+ ", Propulsao=" + getPropulsao()
				+ ", Renavam=" + renavam 
				+ ", chassi=" + chassi  
				+ ", NumeroDeEixos="+ getNumeroDeEixos() 
				+ "]";
	}

}
