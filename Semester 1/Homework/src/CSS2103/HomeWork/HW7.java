package CSS2103.HomeWork;

public class HW7 {
    public static void main(String[] args) {
        int array1[] = new int[5]; //สร้าง array
        int array2[] = new int[5]; //สร้าง array

        randomArray(array1); //เรียกใช้ method
        randomArray(array2); //เรียกใช้ method

        System.out.print("array1 : ");
        printArray(array1); //เรียกใช้ method
        System.out.print("array2 : ");
        printArray(array2); //เรียกใช้ method
        System.out.println("");

        plusArray(array1,array2); //เรียกใช้ method
        minusArray(array1,array2); //เรียกใช้ method
        multipliedArray(array1,array2); //เรียกใช้ method
        divideArray(array1,array2); //เรียกใช้ method
        moduloArray(array1,array2); //เรียกใช้ method

    }

    public static void randomArray(int []arr){
        for (int i = 0 ; i < arr.length ; i++){ //วนลูปตามขนาด array
            arr[i] = (int)(1+Math.random()*100); //random เลข
        }
    }
    public static void printArray(int arr[]){
        for (int i = 0 ; i < arr.length ; i++){ //วนลูปตามขนาด array
            System.out.print(" " + arr[i]); //ปริ้นค่่าใน array
        }
        System.out.println("");
    }
    public static void plusArray(int arr1[],int arr2[]){
        int plusarr[] = new int[5]; //สร้าง array
        for (int i = 0 ; i < arr1.length ; i++){ //วนลูปตามขนาด array
            plusarr[i] = arr1[i] + arr2[i]; //บวกค่าใน array
        }
        System.out.print("plus array : ");
        printArray(plusarr);
    }
    public static void minusArray(int arr1[],int arr2[]){
        int minusarr[] = new int[5]; //สร้าง array
        for (int i = 0 ; i < arr1.length ; i++){ //วนลูปตามขนาด array
            minusarr[i] = arr1[i] - arr2[i]; //ลบค่าใน array
        }
        System.out.print("minus array : ");
        printArray(minusarr);
    }
    public static void multipliedArray(int arr1[],int arr2[]){
        int mutiarr[] = new int[5]; //สร้าง array
        for (int i = 0 ; i < arr1.length ; i++){ //วนลูปตามขนาด array
            mutiarr[i] = arr1[i] * arr2[i]; //คูณค่าใน array
        }
        System.out.print("multiple array : ");
        printArray(mutiarr);
    }
    public static void divideArray(int arr1[],int arr2[]){
        int divdarr[] = new int[5]; //สร้าง array
        for (int i = 0 ; i < arr1.length ; i++){ //วนลูปตามขนาด array
            divdarr[i] = arr1[i] / arr2[i]; //หารค่าใน array แบบเอาส่วน
        }
        System.out.print("divide array : ");
        printArray(divdarr);
    }
    public static void moduloArray(int arr1[],int arr2[]){
        int modarr[] = new int[5]; //สร้าง array
        for (int i = 0 ; i < arr1.length ; i++){ //วนลูปตามขนาด array
            modarr[i] = arr1[i] % arr2[i]; //หารค่าใน array แบบเอาเศษ
        }
        System.out.print("modulo array : ");
        printArray(modarr);
    }
}
