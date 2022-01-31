import java.util.Locale;
import java.util.Scanner;

public class test2 {
    public static void main(String[] args) {
        Scanner kn = new Scanner(System.in);
        System.out.print("Enter word : ");
        String word = kn.nextLine();

        String temp = word.toLowerCase();
        int size = word.length() - 1;

        if(temp.charAt(size) == 'y'){
            if (temp.charAt(size - 1) == 'a' || temp.charAt(size - 1) == 'e' || temp.charAt(size - 1) == 'i' ||
                    temp.charAt(size - 1) == 'o' || temp.charAt(size - 1) == 'u'){
                System.out.println(word + "s");
            }else {
                temp = word.substring(0,size - 1);
                System.out.println(temp + "ies");
            }
        }else {
            System.out.println(word);
        }
    }
}
