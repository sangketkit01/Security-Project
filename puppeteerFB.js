import puppeteer from "puppeteer";

async function loginFB(username, password) {
  if (!username || !password) {
    console.error("Username and password are required");
    process.exit(1);
  }

  let browser;
  try {
    browser = await puppeteer.launch({
      headless: true,
      args: [
        "--no-sandbox",
        "--disable-setuid-sandbox",
        "--disable-infobars",
        "--window-size=1280,800",
      ],
    });

    const page = await browser.newPage();
    await page.setUserAgent(
      "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36"
    );

    await page.goto("https://www.facebook.com/", {
      waitUntil: "networkidle0",
      timeout: 60000,
    });

    await page.waitForSelector("input#email");
    await page.waitForSelector("input#pass");

    await page.type("input#email", username);
    await page.type("input#pass", password);

    await page.waitForSelector("button[name='login']");
    await page.click("button[name='login']");

    try {
      await page.waitForFunction(
        () => document.querySelector("div._9ay7") !== null,
        { timeout: 5000 }
      );
      console.log("Login failed: Incorrect username or password");
      process.exit(1);
    } catch (error) {

      console.log("Login successful");
      process.exit(0);
    }
  } catch (error) {
    console.error("Error occurred:", error);
  } finally {
    if (browser) {
      await browser.close();
    }
  }
}

const args = process.argv.slice(2);
const username = args[0];
const password = args[1];

loginFB(username, password);
