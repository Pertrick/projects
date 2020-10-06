package com.TrafficLightSimulator;


public class TrafficLightSimulator implements Runnable{
	
	private Thread thrd; //holds the thread that runs the simulator
	private TrafficLightColor tlc; //holds the traffic light color
	boolean stop = false;  //set to true to stop the simulation
	boolean changed = false; // true when the light has changed
	
	public TrafficLightSimulator(TrafficLightColor init) {
		tlc = init;
		
		thrd = new Thread(this);
		thrd.start();
	}
	
	public TrafficLightSimulator(){
		tlc = TrafficLightColor.RED;
		
		thrd = new Thread(this);
		thrd.start();
		}
	
	//start up the light
	public void run() {
		
		while (!stop) {
			try {
			switch(tlc) {
			case GREEN:
				Thread.sleep(10000); //green for 10 second
				break;
			case YELLOW:
				Thread.sleep(2000); //yellow for 2 second
				break;
				
			case RED:
				Thread.sleep(12000); //red for 12 seconds
				break;
			}
			
			}
			catch(InterruptedException exc){
				System.out.println(exc);
			}
			
			changeColor();
		}
	}
	

	//change color
	synchronized void changeColor() {
		switch(tlc) {
		case RED:
			tlc = TrafficLightColor.GREEN;
			break;
		case YELLOW:
			tlc =TrafficLightColor.RED;
			break;
		case GREEN:
			tlc = TrafficLightColor.YELLOW;
			
		}
		
		changed = true;
		notify(); //signal that the light has changed
	}
	
	//wait untila a light change occurs
	synchronized void waitForChange() {
		try {
			while(!changed)
				wait(); //wait for light to change
			changed = false;
			
		}
		catch(InterruptedException exc) {
			System.out.println(exc);
		}
	}
		//return current color.
		synchronized TrafficLightColor getColor() {
			return tlc;
		}
		
		//stop the traffic light.
		synchronized void cancel() {
			stop = true;
		}
	
	
	
	public static void main (String args[]) {
		
		TrafficLightSimulator t1= new TrafficLightSimulator(TrafficLightColor.GREEN);
		
		for(int i=0; i<9; i++) {
			System.out.println(t1.getColor());
			t1.waitForChange();
		}
		
		t1.cancel();
	}
	
}



