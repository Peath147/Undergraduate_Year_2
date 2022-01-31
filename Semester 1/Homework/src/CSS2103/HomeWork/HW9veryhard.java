package CSS2103.HomeWork;

public class HW9veryhard {
    public static void main(String[] args) {
        int array[] = new int[5];
        magicSquares();
        /*magicSquares ผมทำโดยการเอาที่ว่าเป็นจัวที่แทนค่า1-16ในตารางมาเป็นตัวตั้ง
          แล้วเอาตัวมุมซ้ายบนไปหารกับเลขที่สุ่มมาว่าได้เท่าไหร่แล้วจึงนำเลขนั้นไปคูณเข้ากับทุกตัวในตาราง
          จึงทำให้ผลบวกทั้งหมดเท่ากัน*/

        System.out.println("");
        System.out.println("isAllEven");
        randomArray(array);
        printArray(array);
        System.out.println(isAllEven(array));

    }
    public static void magicSquares(){
        int array[][] = {{16, 3 , 2 , 13},
                            {5 , 10, 11, 8 },
                            {9 , 6 , 7 , 12},
                            {4 , 15, 14, 1 }};
        int magicSquares[][] = new int[4][4];

        int randomNumber = (int)(1+Math.random()*50);
        System.out.println("random number : "+randomNumber);

        int mutiNumber = randomNumber / array[0][0];
        System.out.println("topleft number : "+ mutiNumber);

        for (int row = 0 ; row < array.length ; row++){
            for (int colum = 0 ; colum < array[row].length ; colum++){
                magicSquares[row][colum] = array[row][colum] * mutiNumber;
            }
        }
        printArray(magicSquares);
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
    public static void printArray(int arr[]){
            System.out.print("[");
            for(int colum = 0 ; colum < arr.length ; colum++){ //วนลูปตามขนาดแถวแนวตั้ง array
                System.out.print(" "+arr[colum]+","); //ปริ้นค่า array
            }
            System.out.println(" ]");
        }
    public static boolean isAllEven(int arr[]){
        boolean even = false; //สร้างตัวแปรบูลีน
        for (int i = 0 ; i < arr.length ; i++){ //วนลูปเท่าจำนวน array
            if (arr[i] % 2 == 0){ //เช็คว่าเป็นเลขคู่ไหมด้วยการหารด้วย 2 ถ้าเท่ากับ 0 คือเลขคู่
                even = true; //ใส่ค่าให้ even เป็น true
            }else {
                even = false; //ใส่ค่าให้ even เป็น false
                break; //ทำให้ลูปหยุดทำงานแล้วไปทำคำสั่ง return
            }
        }
        return even;
    }
    public static void randomArray(int []arr){
        for (int i = 0 ; i < arr.length ; i++){ //วนลูปตามขนาด array
            arr[i] = (int)(1+Math.random()*100); //random เลข
        }
    }

}

