package CSS2103.OOO;

import java.util.Scanner;

public class Multiplication {
    public static int ans = 0;
    public static int multiply = 12;
    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);

        System.out.print("Enter : ");
        int F1 = in.nextInt();
        System.out.print("Enter : ");
        int F2 = in.nextInt();

        Multiplication myObj = new Multiplication();
        myObj.Multiplication(F1);
        myObj.Multiplication(F1,F2);

    }
    public static void Multiplication(int f1){
        System.out.println("ผลลัพธ์ :");
        for (int i = 1 ; i <= multiply ; i++){
            System.out.println(" " + f1 + " * " + i + " = " +(f1*i));
        }
        System.out.println();
    }
    public static void Multiplication(int f1, int f2){
        System.out.println("ผลลัพธ์ :");
        for (int i = 1 ; i <= f2 ; i++){
            System.out.println(" " + f1 + " * " + i + " = " +(f1*i));
        }
        System.out.println();
    }
}
