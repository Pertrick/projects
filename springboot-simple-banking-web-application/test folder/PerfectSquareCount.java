package test;

import java.util.Arrays;
import java.util.Scanner;

public class PerfectSquareCount {
	static int save[];
	static int L; //L = Length
	static int W; //W = Width
	
	//method when L==M
	public static int equal(int L, int W) {
		int n= L=W;
		
		return n* (n+ 1) * (2 * n + 1)/6;
	}
	
	//method when L!=M
	public static int unEqual(int L, int W) {
		
		return L*(L+ 1) * (3*W-L + 1)/6;
	}


	public static void main(String[] args) {
		
		Scanner input = new Scanner(System.in);
		System.out.print("Enter the number of test cases(n): ");
		int testCase = input.nextInt();
		
		save = new int[testCase];
		
		for(int count=0; count<testCase; count++) {
			
			
			System.out.print("Enter length for case "+ Math.addExact(count, 1)  + ": ");
			 L = input.nextInt();
			 
			
			System.out.print("Enter Width  for case "+ Math.addExact(count, 1)  + ": ");
			 W = input.nextInt();
			
			 System.out.println("");
			     // case 1: if L==W
			   
				if ( L==W ) {
					
					save[count] =equal(L,W);
					
					//System.out.println("number of perfect square is " + equal(L,W));						
				}
				
				 // case 2: if L!=W and W<L
				else if((L !=W) && W <L ){
					
					int temp = L;
					L = W;
					W = temp;
					save[count] =unEqual(L,W);
					//System.out.println("number of perfect square is " + unEqual(L,W));	
				}
				
				// case 2: if L!=W and W>L
				else if((L !=W) && W >L ) {
					save[count] =unEqual(L,W);
					
					//System.out.println("number of perfect square is " + unEqual(L,W));
					
				}
				
			}
		
		System.out.println("\nNumber of Perfect Squares for each cases.");
		
		
		for( int i=0;  i<save.length; i++) {
			System.out.println("case "+ Math.addExact(i, 1) + ": " + save[i]);
		}
		
		
			
		}

}
