package CSS2103.OOO;

import java.util.List;

public class sort {
    public static void selectionSort(String[] arr){
        for (int i = 0; i < arr.length - 1; i++)
        {
            int index = i;
            for (int j = i + 1; j < arr.length; j++){
                String word = "";

                if (arr[j].compareTo(arr[index]) < 0){
                    index = j;//searching for lowest index
                }
            }
            String smallerNumber = arr[index];
            arr[index] = arr[i];
            arr[i] = smallerNumber;
        }
    }

    public static void InsertionSort(String[] arr) {

            int n = arr.length;
            for (int i = 1; i < n; ++i) {

                for(String x:arr){
                    System.out.print(x+" ");
                }
                System.out.println("");

                String key = arr[i];
                int j = i - 1;

            /* Move elements of arr[0..i-1], that are
               greater than key, to one position ahead
               of their current position */
                while (j >= 0 && arr[j].compareTo(key) > 0) {
                    arr[j + 1] = arr[j];
                    j = j - 1;
                }
                arr[j + 1] = key;
            }
        }

    public static void ShellSort(String[] arr) {
        int n = arr.length;

        for (int gap = n / 2; gap > 0; gap /= 2) {
            for (int i = gap; i < n; i += 1) {
                String temp = arr[i];
                for(String x:arr){
                    System.out.print(x+" ");
                }
                System.out.println("");
                int j;
                for (j = i; j >= gap && arr[(j - gap)].compareTo(temp) > 0; j -= gap)
                    arr[j] = arr[j - gap];

                arr[j] = temp;
            }

        }
    }

        public static void main(String a[]){
        String[] arr1 = {"john","tzha","fyau","ctai","nbal","ddix","sguo","azhu","aviv","sida","kuan","vyas","oleg","levy","kwak","muir","peck","ravi","alan","yort","azhu","andy","anna","lily"};
        System.out.println("Before Selection Sort");
        for(String i:arr1){
            System.out.print(i+" ");
        }
        System.out.println();

        ShellSort(arr1);

            System.out.println();
            for(String i:arr1){
                System.out.print(i+" ");
            }
            System.out.println();
    }
}
