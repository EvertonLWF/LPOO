package control;

import model.Bicicleta;
import model.Caminhao;
import model.Carro;

public class App {
	
	public static void main(String[] args) {
		
		Bicicleta bicicleta = new Bicicleta();
		bicicleta.setMarca("Caloi");
		bicicleta.setAnoFabricacao(2018);
		bicicleta.setChassi(1122334455);
		bicicleta.setModelo("Speed 21 marchas");
		bicicleta.setTamanhoRoda(28);
		System.out.println(bicicleta);
		
		Carro carro = new Carro();
		carro.setModelo("Uno");
		carro.setMarca("Fiat");
		carro.setAnoFabricacao(2014);
		carro.setChassi(1234567890);
		carro.setNumeroDeEixos(2);
		carro.setPropulsao("gasolina/álcool");
		carro.setPlaca("IFM1234");
		carro.setRenavan(100200300);
		System.out.println(carro);
		
		Caminhao caminhao = new Caminhao();
		caminhao.setModelo("Acello");
		caminhao.setMarca("Mercedes Bens");
		caminhao.setAnoFabricacao(1992);
		caminhao.setChassi(1188995544);
		caminhao.setNumeroDeEixos(3);
		caminhao.setPropulsao("diesel");
		caminhao.setPlaca("IJP0058");
		caminhao.setRenavan(400500877);
		System.out.println(caminhao);
		
	}

}
