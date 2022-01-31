package CSS2103.HomeWork;

import java.util.*;
public class HM1 {
    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);
        System.out.print("Enter radius = ");
        double r = in.nextDouble();
        double circle_area = Math.PI * Math.pow(r , 2);
        System.out.println("circle area = "+circle_area);
    }
}
