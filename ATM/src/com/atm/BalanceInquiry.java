package com.atm;

public class BalanceInquiry extends Transaction {

	//BalanceInquiry Constructor
	public BalanceInquiry(int userAccountNumber, Screen atmScreen, 
			BankDatabase atmBankDatabase) {
		
		super(userAccountNumber, atmScreen, atmBankDatabase);
	}
	
	@Override
	public void execute() {
		 
		BankDatabase bankDatabase = getBankDatabase();
		Screen screen =getScreen();
		
		//get the Available balance for the account involved
		double availableBalance = bankDatabase.getAvailableBalance(getAccountNumber());
	   
		//get the total balance for the account involved
		double totalBalance = bankDatabase.getTotalBalance(getAccountNumber());
	
		//display the balance information to the screen
		screen.displayMessageLine("\nBalance Informaton");
		screen.displayMessage(" -Available balance: ");
		screen.displayDollarAmount(availableBalance);
		screen.displayMessage("\n - Total balance:  ");
		screen.displayDollarAmount(totalBalance);
		screen.displayMessageLine("");
	
	
	
	
	}
	
}
