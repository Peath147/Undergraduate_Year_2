package CSS2103.HomeWork;

import java.util.Scanner;
public class HW3 {

    public static void main(String[] args) {
        int n;
        char ch;
        Scanner in = new Scanner(System.in);
        System.out.print("enter n =");
        n = in.nextInt();
        System.out.print("enter ch =");
        ch = in.next().charAt(0);
        methodA(n);
        methodB(n);
        methodC(n);
        methodD(n);
        methodE(n, ch);
    }
    static void methodA (int n) {
        for(int i=n; i>1; i-=2)
            System.out.println(i);
    }
    static void methodB (int n) {
        for(int i=1; i<n; i++){
            for(int j=n;j>n-i;j--){
                System.out.println(i);
            }
        }
    }
    static void methodC (int n) {
        for(int i=n; i>0; i--){
            for(int j=0;j>i;j++){
                fun(n);
            }
        }
    }
    static void fun (int n) {
        for(int i=1; i<n; i=i*3){
            System.out.println(i);
        }
    }
    static void methodD (int n) {
        for(int i=n; i<=n; i++){
            for(int j=n;j>1;j=j/2){
                System.out.println(j);
            }
        }
    }
    static void methodE (int n,char ch) {
        if(ch =='a'){
            for(int s=1;s<n;s++)
                for(int t=1; t<n; t=t*4){
                    System.out.println(t);
                }
        }
        else if (ch == 'b'){
            for(int i=0;i<n;i++){
                System.out.println(i);
            }
        }
        else if (ch == 'c'){
            for(int i=0; i<n;i++){
                System.out.println(i);
            }
        }
        else{
            for(int k=n;k>1;k--)
                for(int m=1; m<k;m++){
                    System.out.println(m);
                }
        }

    }
}
