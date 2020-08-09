package com.atm;

public class CashDispenser {
	
	//the default initial number of bills in the cash dispenser
	private final static int INITIAL_COUNT =500;
	private int count; //number of $20 bills remaining
	
	
	//no-argument CashDispenser constructor initializes count to default
	public CashDispenser() {
		count = INITIAL_COUNT; //set count attribute to default
	}
	
	//simulate dispensing of specified amount to cash
	public void dispenseCah(int amount) {
		int billsRequired = amount/20; // number of $20 bills required
		count -=billsRequired; //update the count of bills
	}
	
	public boolean isSufficientCashAvailable(int amount) {
		
		int billsRequired = amount /20; //number of $20 bills
		
		if(count >= billsRequired) {
			return true; //enough bills available
		}
		else
			return false;
	}
	

}
