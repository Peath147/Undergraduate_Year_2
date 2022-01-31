package CSS2103.OOO;

public class MaxNumber {
    private static int num1 = 11;
    private static int num2 = 22;
    private static int num3 = 33;
    private static int max = 0;

    public static void main(String[] args) {
        MaxNumber round1 = new MaxNumber();
        MaxNumber round2 = new MaxNumber();

        round1.MaxNumber(num1,num2);
        round1.MaxNumber(num1,num2,num3);
    }

    public static void MaxNumber(int num1,int num2){
        if (num1 > num2){
            System.out.println("Max number round 1 = " + num1);
        }else if(num1 < num2){
            System.out.println("Max number round 1 = " + num2);
        }
    }
    public static void MaxNumber(int num1, int num2, int num3){
        if (num1 > max){
            max = num1;
        }
        if (num2 > max){
            max = num2;
        }
        if (num3 > max){
            max = num3;
        }
        System.out.println("Max number round 2 = " + max);
    }
}
