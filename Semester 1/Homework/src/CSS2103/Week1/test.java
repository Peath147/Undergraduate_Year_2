package CSS2103.Week1;

public class test {
    public static void main(String[] args) {
        System.out.println("Hello world ");
        p1();
        p2();

        test obj1 = new test();
        obj1.p4();

        System.out.println(p5(5));
    }
    public static void p1() {
        System.out.println("Hello world P1");
    }
    public static void p2() {
        System.out.println("Hello world P2");
    }
    public void p4() {
        System.out.println("Hello world P4");
    }
    public static int p5(int x) {
        return x;
    }
}
