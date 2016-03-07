using System;
using System.Windows.Forms;
using OpenQA.Selenium;
using OpenQA.Selenium.Remote;
using OpenQA.Selenium.Chrome;

namespace SeleniumScaper
{
    class Program
    {
        static void Main(string[] args)
        {
            IWebDriver driver = new ChromeDriver("Libraries/");

           // Console.WriteLine("Please enter a stackover flow URL");
           // string link = Console.ReadLine();


            driver.Url = "https://www.aerlingus.com/html/flightSearchResult.html#/fareType=RETURN&fareCategory=ECONOMY&numAdults=1&numChildren=0&numInfants=0&promoCode=&groupBooking=false&sourceAirportCode_0=DUB&destinationAirportCode_0=CDG&departureDate_0=2016-04-02&sourceAirportCode_1=CDG&destinationAirportCode_1=DUB&departureDate_1=2016-04-08";//link;
            driver.Navigate();

            var elements = driver.FindElements(By.XPath("/html/body/div[2]/div/div[3]/div/div/div[1]/div[2]/ul/li[4]/ul/li/span[3]/span[3]"));

            Console.WriteLine("The question was asked");

            foreach (IWebElement el in elements)
            {
                Console.WriteLine(el.Text);
            }

            Console.ReadKey(true);
        }
    }
}
