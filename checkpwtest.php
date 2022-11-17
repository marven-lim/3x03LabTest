<?php
use PHPUnit\Framework\TestCase;
include 'checkpw.php';

final class checkpwtest extends TestCase
{
	public function test_valid_credentials(): void
	{
		$this->assertTrue(isValidCreds("alkjfhdsfaljhwfiwhldh"));
	}
	public function test_invalid_credentials(): void
	{
		$this->assertFalse(isValidCreds("letmein"));
	}
}

?>
