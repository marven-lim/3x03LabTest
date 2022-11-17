import pytest
from selenium import webdriver
from selenium.webdriver.chrome.options import Options
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.common.by import By
from selenium.webdriver.support import expected_conditions as EC

url = "http://localhost/"

def test_valid_login():
	options = Options()
	options.headless = True
	options.add_argument('--no-sandbox')
	options.add_argument('--disable-dev-shm-usage')
	options.add_argument('--window-size=1920,1080')
	browser = webdriver.Chrome(options=options)
	browser.get(url+"index.php")
	browser.find_element(By.NAME, "password").send_keys("sldfhlsdkfhdhk")
	browser.find_element(By.NAME, "submit").click()
	assert "home.php" in browser.current_url
def test_invalid_login():
	options = Options()
	options.headless = True
	options.add_argument('--no-sandbox')
	options.add_argument('--disable-dev-shm-usage')
	options.add_argument('--window-size=1920,1080')
	browser = webdriver.Chrome(options=options)
	browser.get(url+"index.php")
	browser.find_element(By.NAME, "password").send_keys("letmein")
	browser.find_element(By.NAME, "submit").click()
	assert "index.php?error=" in browser.current_url
