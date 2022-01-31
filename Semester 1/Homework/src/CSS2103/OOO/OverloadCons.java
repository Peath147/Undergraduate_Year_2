package CSS2103.OOO;

public class OverloadCons {
    public static int num1 = 0;
    public static double num2 = 0;
    public static double total = 0;

    public static void main(String[] args) {
        OverloadCons obj1 = new OverloadCons(20);
        OverloadCons obj2 = new OverloadCons(30.5);
        System.out.println("Test Calculator");
        System.out.println("The result of "+ num1 + " + " + num2 + " = " + total);
    }
    public OverloadCons(int x){
        num1 = x;
        total += num1;
    }
    public OverloadCons(double x){
        num2 = x;
        total += num2;
    }
}
