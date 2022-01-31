package CSS2103.HomeWork;

public class HW6 {
    public static void method1(int[] a, int m) {
        double[] b = method1(a,6.0);
        a[0] = a[0]*m;
        a[2] = (int)(b[0]+b[1]);
        m = m+5;
    }
    public static double[] method1(int[] a, double x) {
        double[] b = new double[2];
        b[0] = a[0]+x;
        b[1] = a[1]+x;
        return b;
    }

    public static void main(String[] args) {
        int[] a={2,3,4};
        int k=5;
        method1(a , k);
        System.out.println(k);
        System.out.println(a[0]);
        System.out.println(a[1]);
        System.out.println(a[2]);
        System.out.println("test");
    }
}
/*
    m = m+5; 5+5
    a[2] = (int)(b[0]+b[1]); // 8+9
    a[0] = a[0]*m; // 2*5
    b[1] = a[1]+x; // 3+6.0
    b[0] = a[0]+x; // 2+6.0
    double[] b = new double[2];
    double[] b = method1(a,6.0);
    method1(a , k);
*/