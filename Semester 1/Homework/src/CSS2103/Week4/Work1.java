package CSS2103.Week4;

public class Work1 {
    public static int my(int n){
        if(n <= 2){
            return 4;
        }else{
            return my(n-2)+n; // 3   1       5+3+4
        }
    }

    public static void main(String[] args) {
        int n = 8;
        char c = 'a';
        String word = "1234f abcd";
        System.out.println(c + 5);
        System.out.println("abcd" == word.substring(6));

        System.out.println(my(5));

        int i = 1;
        while (i < 5){
            if(i % 2 == 0){
                System.out.println("even " + i);
                continue;
            }else {
                System.out.println("odd " + i);
            }
            i++;
        }

/*
        for (int i = 1; i< n; i = i * 2){
            System.out.println("Het - I'm busy looking at: " + i);
        }

        for (int i = 0; i < n; i++){
            System.out.println("Hey - i'm busy looking at: " + i);
            System.out.println("Hmm.. Let's have another look at: " + i);
            System.out.println("And another: " + i);
        }

        for (int i = 1; i <= n; i++){
            for (int j = 1; j < n; j = j * 2){
                System.out.println("Het - I'm busy looking at: " + i + " and " + j);
            }
        }

        for (int i = 1; i <= n; i++){
            for (int j = 1; j <= n; j++){
                System.out.println("Het - I'm busy looking at: " + i + " and " + j);
            }
        }

        for (int i = 1; i <= Math.pow(2, n); i++){
            System.out.println("Het - I'm busy looking at: " + i);
        }

        for (int i = 1; i <= factorial(n); i++){
        System.out.println("Het - I'm busy looking at: " + i);
        }*/
    }
}
