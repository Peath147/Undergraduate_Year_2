package CSS2103;


import java.util.Scanner;

public class Yolo {
    public static void main(String[] args) {
            Scanner kb = new Scanner(System.in);
            int n = kb.nextInt();
            int x = 1,y = (n - 1);
        for (int i = 0; i < n; i++) {
            for (int j = 0; j <= n; j++) {
                if(j == i|| j == (n - i)){
                    System.out.print("*");
                }else if(j >= x && j <= y && i > 0 && i < (n-1)){
                    System.out.print(" ");
                }else{
                    System.out.print("*");
                }
            }
            System.out.println();
        }
    }
}

