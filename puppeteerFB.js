import puppeteer from "puppeteer";

async function loginIG(username, password) {
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

        await page.goto("https://www.instagram.com/accounts/login/", {
            waitUntil: "networkidle0",
            timeout: 60000,
        });

        if (typeof username !== "string") username = String(username);
        if (typeof password !== "string") password = String(password);

        await page.waitForSelector("input[name='username']");
        await page.waitForSelector("input[name='password']");

        await page.type("input[name='username']", username);
        await page.type("input[name='password']", password);

        await page.waitForSelector('button._acan._acap._acas._aj1-._ap30:not([disabled])');
        await page.click("button._acan._acap._acas._aj1-._ap30");

        // รอให้ element ปรากฏ
        try {
            await page.waitForFunction(
                () =>
                    document.querySelector(
                        "div.xkmlbd1.xvs91rp.xd4r4e8.x1anpbxc.x1m39q7l.xyorhqc.x540dpk.x2b8uid"
                    ) !== null,
                { timeout: 5000 }
            );
            console.log("Login failed: Incorrect password");
        } catch (error) {
            console.log("Login successful");
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

loginIG(username, password);