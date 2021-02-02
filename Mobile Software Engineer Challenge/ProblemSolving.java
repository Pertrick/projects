package test;

import java.util.Scanner;

public class ProblemSolving {
	
	/***************************************************************************************
    ************************METHODS FOR QUESTION ONE(1)*************************************
	****************************************************************************************/
	
	//method for base conversion( from base 10 to base 2)
	public static String baseConversion(String number, int base1, int base2) {
		
		return Integer.toString(Integer.parseInt(number, base1), base2);
		
	}
	
	
	//binary gap method
	public  static int binaryGap(String binary) {
		
		//initializing the largestGap to zero
       int largestGap =0;
		
       //for loop looping through the binary number
		for(int i=1, gap =0;  i< binary.length(); i++ ) {
			
		 
			while (i<binary.length() && binary.charAt(i) =='0') {
				i++;
				gap++;
			}
			
			if (gap > largestGap && i < binary.length()) {
				largestGap = gap;
			}
			gap =0;
		}
		
		return largestGap;
		
	}
	
	/***************************************************************************************
	    ************************END OF METHODS FOR QUESTION ONE(1)*************************************
		****************************************************************************************/
	
	
	
	
	/***************************************************************************************
	    ************************METHODS FOR QUESTION TWO(2)*************************************
		****************************************************************************************/
	
	public static int sentenceCheck(String correct, String wrong) {
		
		//removing excess white spaces between words
		correct = correct.toUpperCase().replaceAll("\\s+", " ");
		wrong = wrong.toUpperCase().replaceAll("\\s+", " ");
		
		int counter = 0;
		
		for(int i=0; i<correct.length(); i++) {
			
		   if(correct.charAt(i) != wrong.charAt(i)) {
				counter++;
			 }
			
		}
		
		
		return counter;
		
	}
	
	
	
	
	
	/***************************************************************************************
	    ************************END OF METHODS FOR QUESTION TWO(2)*************************************
		****************************************************************************************/
	
	

	public static void main(String[] args) {

   /************************QUESTION 1 MAIN METHOD*****************************************************/
		
		Scanner input = new Scanner(System.in);
		System.out.print("***BINARY GAP***\nEnter Number (base 10) to check for binary gap: ");
		
		//stores number in base 10
		String number = input.nextLine();
		
		//converting number to base 2
		String binary =baseConversion(number, 10, 2);
		
		//prints out the binary gap using the binary gap method
		System.out.println("Maximum Binary Gap: " + binaryGap(binary) );
		
		
   /************************END OF Question 1 MAIN METHOD***********************************************/
		
		
		
		
		
  /************************Question TWO MAIN METHOD*******************************************************/
		
		System.out.println("\n");
		Scanner word = new Scanner(System.in);
		
		System.out.print("Enter the correct Sentence: ");
		String correct = word.nextLine();
		
		System.out.print("\nEnter the wrong Sentence: ");
		String wrong = word.nextLine();
		
		System.out.println("Numbers of Mistook Characters: " + sentenceCheck(correct, wrong));
		
		
  /************************Question 1 MAIN METHOD***************************************************/
		
			
		
	}

}
