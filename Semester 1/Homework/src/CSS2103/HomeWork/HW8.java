package CSS2103.HomeWork;

public class HW8 {
    public static void main(String[] args) {

        int arr2D[][] = new int[5][5]; //สร้าง Array 2 มิติ

        randomArray(arr2D); //เรียกใช้ method
        printArray(arr2D); //เรียกใช้ method
        sumArray(arr2D); //เรียกใช้ method
        avgArray(arr2D); //เรียกใช้ method
        minArray(arr2D); //เรียกใช้ method
        maxArray(arr2D); //เรียกใช้ method
    }

    public static void randomArray(int arr[][]){
        for (int row = 0 ; row < arr.length ; row++){ //วนลูปตามขนาดแถวแนวนอน array
            for(int colum = 0 ; colum < arr[row].length ; colum++){ //วนลูปตามขนาดแถวแนวตั้ง array
                arr[row][colum] = (int)(1+Math.random()*100); //สุ่มเลขแล้วใส่ค่าใน array
            }
        }
    }
    public static void printArray(int arr[][]){
        for (int row = 0 ; row < arr.length ; row++){ //วนลูปตามขนาดแถวแนวนอน array
            System.out.print("[");
            for(int colum = 0 ; colum < arr[row].length ; colum++){ //วนลูปตามขนาดแถวแนวตั้ง array
                System.out.print(" "+arr[row][colum]+","); //ปริ้นค่า array
            }
            System.out.println(" ]");
        }
    }
    public static void sumArray(int arr[][]){
        int sum = 0;
        for (int row = 0 ; row < arr.length ; row++) { //วนลูปตามขนาดแถวแนวนอน array
            for (int colum = 0; colum < arr[row].length; colum++) { //วนลูปตามขนาดแถวแนวตั้ง array
                sum += arr[row][colum]; //บวกค่าลงใน sum
            }
        }
        System.out.println("sum of array : " + sum);;
    }
    public static void avgArray(int arr[][]){
        int sum = 0;
        for (int row = 0 ; row < arr.length ; row++) { //วนลูปตามขนาดแถวแนวนอน array
            for (int colum = 0; colum < arr[row].length; colum++) { //วนลูปตามขนาดแถวแนวตั้ง array
                sum += arr[row][colum]; //บวกค่าลงใน sum
            }
        }
        System.out.println("avg of array : " + sum / 25); //เอาผลรวมไปหารด้วย25เพื่อหาค่าเฉลี่ย
    }
    public static void minArray(int arr[][]){
        int min = 100;
        for (int row = 0 ; row < arr.length ; row++) { //วนลูปตามขนาดแถวแนวนอน array
            for (int colum = 0; colum < arr[row].length; colum++) { //วนลูปตามขนาดแถวแนวตั้ง array
                if (arr[row][colum] <= min) { //เทียบค่าว่าค่าใน array น้อยกว่า min หรือไม่
                    min = arr[row][colum]; //แทนค่า array ลงใน min
                }
            }
        }
        System.out.println("min of array : " + min);;
    }
    public static void maxArray(int arr[][]){
        int max = 0;
        for (int row = 0 ; row < arr.length ; row++) { //วนลูปตามขนาดแถวแนวนอน array
            for (int colum = 0; colum < arr[row].length; colum++) { //วนลูปตามขนาดแถวแนวตั้ง array
                if (arr[row][colum] >= max) { //เทียบค่าว่าค่าใน array มากกว่า max หรือไม่
                    max = arr[row][colum]; //แทนค่า array ลงใน max
                }
            }
        }
        System.out.println("max of array : " + max);;
    }
}
