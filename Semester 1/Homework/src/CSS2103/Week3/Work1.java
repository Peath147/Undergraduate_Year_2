package CSS2103.Week3;

import javax.lang.model.element.VariableElement;

public class Work1 {
    public static void main(String[] args) {
        try {
            int x = 0;
            System.out.println(x);
            double mylist[] = new double[10];
            for(double value:mylist)
                System.out.println(value);
            System.out.println(mylist);
            System.out.println(mylist[0]);
            System.out.println(mylist[10]);
        } catch (ArrayIndexOutOfBoundsException e){
            System.out.println("The index you have entered is invalid");
        }
        double r = Math.random();
        System.out.println("r : "+r);
        int r1 = (int)(5+Math.random()*15);
        System.out.println("r1 : "+r1);
    }
}
