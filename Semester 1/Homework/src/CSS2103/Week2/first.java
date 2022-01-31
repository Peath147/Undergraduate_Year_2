package CSS2103.Week2;

import java.util.*;

public class first {
    public static double timeMethod1(int n) {
        double sum = 0.0;
        for (int i = 0; i <= n; i++) {
            sum += i;
        }
        return sum;
    }
    public static double timeMethod2(int n) {
        if(n==1){
            return 1;
        }
        else return (n + timeMethod2(n-1));
    }
    public static double timeMethod3(int n) {
        return (((int)(n/2))*(2+(n-1)));
    }

    public static void main(String[] args) {
        long startTime = 0;
        long elapsedTimeNs = 0;
        double elapsedTimeInmilliSecond = 0.0;

        Scanner inout1 = new Scanner(System.in);
        System.out.print("Enter number : ");
        int n = inout1.nextInt();

        startTime = System.nanoTime();
        System.out.println("Answer1 : " + timeMethod1(n));
        elapsedTimeNs = System.nanoTime() - startTime;
        elapsedTimeInmilliSecond = (double) elapsedTimeNs / 1_000_000;
        System.out.println("time1   : " + (elapsedTimeInmilliSecond) + "millisecond");

        startTime = System.nanoTime();
        System.out.println("Answer2 : " + timeMethod2(n));
        elapsedTimeNs = System.nanoTime() - startTime;
        elapsedTimeInmilliSecond = (double) elapsedTimeNs / 1_000_000;
        System.out.println("time2   : " + (elapsedTimeInmilliSecond) + "millisecond");

        startTime = System.nanoTime();
        System.out.println("Answer3 : " + timeMethod3(n));
        elapsedTimeNs = System.nanoTime() - startTime;
        elapsedTimeInmilliSecond = (double) elapsedTimeNs / 1_000_000;
        System.out.println("time3   : " + (elapsedTimeInmilliSecond) + "millisecond");

    }
}


