package CSS2103.Project;

import java.io.*;
import java.util.*;
import java.util.Random;

public class Project {
    public static List<List> Book = new ArrayList<List>();
    public static List<List> sortedBook = new ArrayList<List>();
    public static long startTime,endTime;

    public static void main (String []agrs){
        Scanner in = new Scanner(System.in);
        System.out.println("" +
                "*** load and show 10 book ***");
        loadBooksToArray();
        printBook(Book,10);

        System.out.println("" +
                "*** show 10 book after selectionSort ***");
        selectionSort();
        printBook(sortedBook,10);

        System.out.println("" +
                "*** 10 linear search ***");
        for (int i = 0; i < 9; i++) {
            System.out.print("Enter ISBN : ");
            String ISBN = in.nextLine();
            linearSearchAlgorithm(ISBN);
        }

        System.out.println("" +
                "*** 10 binary search ***");
        for (int i = 0; i < 9; i++) {
            System.out.print("Search by binary : ");
            String word = in.nextLine();
            binarySearch(sortedBook, word);
        }

        System.out.println("" +
                "\n*** Random ISBN to Binary search ***");
        for (int i = 1; i < 1000; i++){
            int ISBMrand = randomISBN();
            System.out.println("** ISBM : " + sortedBook.get(ISBMrand).get(0) + " " + sortedBook.get(ISBMrand).get(1));
            binarySearch(sortedBook, (String) sortedBook.get(ISBMrand).get(1));
        }

        long duration = (endTime - startTime);
        System.out.println("\n*** Selection Sort Time : "+duration/1_000_000 + " milliseconds ***");
    }

    public static void printBook(List<List> b, int count){
        int booksize = b.get(0).size();

        for (int x = 0 ; x < count ; x++) {
            for (int i = 0; i < (booksize); i++) {
                System.out.print(b.get(x).get(i) + ", ");
            }
            System.out.println();
        }
        System.out.println();
    }

    public static void loadBooksToArray(){
        String path = "src/CSS2103/Project/BX-Books.csv";
        String line = "";

        try{
            BufferedReader br = new BufferedReader(new FileReader(path));

            //while ((line = br.readLine()) != null){
            for (int o = 0; o < 10000; o++) {
                line = br.readLine();
                List book = new ArrayList();
                int i = 0;
                String[] values = line.split(";");
                for (int x = 0; x < values.length; x++) {
                    values[x] = values[x].replace("\"", "");
                }
                Book.add(Arrays.asList(values));
            }

        } catch (IOException ioException) {
            ioException.printStackTrace();
        }

    }

    public static void linearSearchAlgorithm(String ISBN){
        for (int i = 0; i < Book.size(); i++){
            if (Book.get(i).get(0).equals(ISBN)){
                System.out.println(Book.get(i));
                return;
            }
        }
        System.out.println("not found");

    }

    static void selectionSort() {
        startTime = System.nanoTime();
        sortedBook = Book;
        for(int i = 1; i < sortedBook.size() ; i++)
        {
            int min_index = i;
            String minStr = (String) sortedBook.get(i).get(1);
            for(int j = i + 1; j < sortedBook.size(); j++)
            {
                String word = (String) sortedBook.get(j).get(1);
                if(word.compareTo(minStr) < 0)
                {
                    minStr = (String) sortedBook.get(j).get(1);;
                    min_index = j;
                }
            }

            if(min_index != i)
            {
                List temp = sortedBook.get(min_index);
                sortedBook.set(min_index, sortedBook.get(i));
                sortedBook.set(i, temp);
            }
        }
        endTime = System.nanoTime();
    }

    public static int binarySearch(List<List> sorted, String key) {
        int first = 0;
        int upto  = sorted.size();

        while (first < upto) {
            int mid = (first + upto) / 2;
            if (key.compareTo((String) sorted.get(mid).get(1)) < 0) {
                upto = mid;
            } else if (key.compareTo((String) sorted.get(mid).get(1)) > 0) {
                first = mid + 1;
            } else {
                System.out.println(sorted.get(mid));
                return mid;
            }
        }
        System.out.println("Failed");
        return -(first + 1);
    }

    public static int randomISBN(){
        Random rand = new Random();
        int ISBM = rand.nextInt(10000);
        return ISBM;
    }

}
