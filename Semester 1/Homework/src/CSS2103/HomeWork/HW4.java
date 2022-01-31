package CSS2103.HomeWork;

import org.w3c.dom.ls.LSOutput;

import java.util.*;

public class HW4 {
    public static void main(String args[]) {
        ArrayList<Integer> check = new ArrayList<Integer>();

        Scanner in = new Scanner(System.in);
        Random rand = new Random();

        System.out.print("Enter array size : ");
        int n = in.nextInt();

        long startTime = System.nanoTime();

        int[] array1 = new int[n];
        int[] array2 = new int[n];
        int cout = 0;
        boolean duplicate = false;

        for (int i = 0; i < array1.length; i++) {
            array1[i] = rand.nextInt(n);
            array2[i] = rand.nextInt(n);
        }

        System.out.println("Array1 = " + Arrays.toString(array1));
        System.out.println("Array2 = " + Arrays.toString(array2));

        //check duplicate
        for (int i = 0; i < array1.length; i++) {
            for (int x = 0; x < array2.length; x++) {
                if (array1[x] != array2[i]) {
                    cout += 1;
                    if (cout == n) {
                        for (int c : check) {
                            if (array2[i] == c) {
                                duplicate = true;
                            }
                        }
                        if (duplicate == true) {
                            duplicate = false;
                        } else if (duplicate == false) {
                            check.add(array2[i]);
                        }
                    }
                } else if (array2[x] == array1[i]) {
                    break;
                }
            }
            cout = 0;
        }
        System.out.println("duplicate = " + check);

        long endTime = System.nanoTime();

        long duration = (endTime - startTime);

        System.out.println("Runtime = " + duration + " nanosecond");

    }
}