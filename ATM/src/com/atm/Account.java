package com.atm;

public class Account {

	private int accountNumber; //account Number
	private int pin; //pin for authentication
	private double availableBalance; //funds available for withdrawal
	private double totalBalance; //funds available + pending dep
	
	//Account constructor initialize attributes
	public Account(int theAccountNumber, int thePin, double theAvailableBalance, double theTotalBalance){
		accountNumber =theAccountNumber;
		pin = thePin;
		availableBalance = theAvailableBalance;
		totalBalance = theTotalBalance;
		
	}
	
	//determines whether a user-specified PIN matches pin in Accre
	public boolean validatePIN( int userPIN) {
		
		if(userPIN ==pin) {
			return true;
		}
		else
			return false;
	}
		
	//returns available balance
	public double  getAvailableBalance() {
		return availableBalance;
	}
	
	//returns the total balance
	public double getTotalBalance() {
		return totalBalance;
	}
	
	//credits an amount to the account
	public void credit(double amount) {
		totalBalance +=amount; //add to total balance
	}
	
	//debits an amount from the account
	public void debit(double amount) {
		availableBalance -= amount; //subtract from available balance
		totalBalance -=amount; //subtract from total balance
		
	}
	
	//returns account number
	public int getAccountNumber() {
		return accountNumber;
	}
}
