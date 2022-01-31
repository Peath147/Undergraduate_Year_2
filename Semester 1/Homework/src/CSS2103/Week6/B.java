package CSS2103.Week6;

class A{
    {
        System.out.print("1 in A ");
    }static {
        System.out.print("2 ");
        System.out.println("static block in A called ");
    }
    A(){
        System.out.print("3 ");
        System.out.println("Constructor in A called ");
    }
}

public class B extends A{
    {
        System.out.print("4 in B ");
    }static {
        System.out.print("5 ");
        System.out.println("static block in B called ");
    }
    B(){
        System.out.print("6 ");
        System.out.println("Constructor in B called");
    }

    public static void main(String[] args) {
        System.out.println("test");
            B m = new B();
            B m2 = new B();
            B m3 = new B();
    }
}
