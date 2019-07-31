package teste;
 
import org.openqa.selenium.By;
import org.openqa.selenium.Keys;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
 
import org.openqa.selenium.chrome.ChromeDriver;
 
public class Teste
 
{
 
public static void main(String[] args) throws InterruptedException
 
{
 
// Optional, if not specified, WebDriver will search your path for chromedriver.
  System.setProperty("webdriver.chrome.driver", "/home/feijo/Downloads/chromedriver");

  WebDriver driver = new ChromeDriver();
  driver.get("https://web.whatsapp.com/");
  Thread.sleep(1000);  // Let the user actually see something!
  WebElement searchBox = driver.findElement(By.cssSelector("label.eiCXe"));
  searchBox.sendKeys("Andriel");
  searchBox.sendKeys(Keys.ENTER);
  
  int x = 0;
  
  while(x<=100){
      WebElement send = driver.findElement(By.cssSelector("div._13mgZ"));
      send.sendKeys("Teste = "+x);
      x++;
      Thread.sleep(100);
      WebElement seta = driver.findElement(By.cssSelector("button._3M-N-"));
      seta.click();
      
  }
  
  driver.quit();
}
public void testGoogleSearch() throws InterruptedException {
  
}
 
}