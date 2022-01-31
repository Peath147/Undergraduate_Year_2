package CSS2103;

import java.util.Scanner;

public class Lab2DArray {
    public static void main(String[] args) {
        System.out.print("Enter 2D array row : ");
        Scanner in = new Scanner(System.in);
        int rows = in.nextInt();
        System.out.print("Enter 2D array column : ");
        int columns = in.nextInt();

        int twoD[][]=new int [rows][columns];
        System.out.println(twoD);

        for (int i = 0; i < rows; i++){
            for (int j = 0; j < columns; j++){
                System.out.print("twoD["+i+"]["+j+"]");
                twoD[i][j] = in.nextInt();
            }
        }
        for (int i = 0; i < rows; i++){
            for (int j = 0; j < columns; j++){
                System.out.print(twoD[i][j]+" ");
            }
            System.out.println();
        }
    }
}

