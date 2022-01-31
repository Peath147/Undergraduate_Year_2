package CSS2103.HomeWork;

import java.util.*;
public class HW2 {
    public static void main(String[] args) {

        Scanner in = new Scanner(System.in);
        System.out.print("Enter x = ");
        double x = in.nextDouble();
   /*     System.out.print("Enter y = ");
        double y = in.nextDouble();*/
        System.out.println(calcu(x));
/*
        System.out.print("Enter x = ");
        x = in.nextDouble();
        System.out.print("Enter y = ");
        y = in.nextDouble();
        System.out.print("Enter n = ");
        double n = in.nextDouble();
        System.out.println(calcu(x ,y ,n));*/
    }
    //x2 + 2xy + y2 = c
    public static double calcu(double x) {
        double c = Math.pow(x , 2) + x - 1;
        return c;
    }
/*
    public static double calcu(double x ,double y ,double n){
        double c = Math.pow(x , n) + 2*x*y + Math.pow(y , n);
        return c;
    }*/
}
