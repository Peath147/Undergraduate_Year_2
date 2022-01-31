import java.util.*;

public class homework019 {
    public static void main(String[] args) {

        Scanner in = new Scanner(System.in); //สร้างคำสั่งแสกน

        //ข้อ 1
        System.out.print("Enter side 1 : "); //แสดงค่า Enter side 1 :
        double side1 = in.nextDouble(); //รับต่า
        System.out.print("Enter side 2 : "); //แสดงค่า Enter side 2 :
        double side2 = in.nextDouble(); //รับต่า
        System.out.println("hypotenuse : " + hypotenuse(side1, side2)); //เรียกใช้ method hypotenuse
        System.out.println("");

        //ข้อ 2
        System.out.print("Enter number to check : "); //แสดงค่า Enter number1 :
        int checkNum = in.nextInt(); //รับค่าตัวเลข
        morethanzero(checkNum);
        System.out.println("");

        //ข้อ 3
        System.out.print("Enter word : "); //แสดงค่า Enter number1 :
        String word = in.next(); //รับค่า
        vowel(word);
        System.out.println("");

        //ข้อ 4
        System.out.print("Enter hour : "); //แสดงค่า Enter hour :
        int hour = in.nextInt(); //รับค่า
        System.out.print("Enter minute : "); //แสดงค่า Enter minute :
        int minute = in.nextInt(); //รับค่า
        calculator(hour,minute);
        System.out.println("");

        //ข้อ 5
        System.out.print("Enter start number : ");
        int Fnumber = in.nextInt(); //รับค่า
        System.out.print("Enter end number : ");
        int Enumber = in.nextInt(); //รับค่า
        sumOddNumber(Fnumber,Enumber);

    }

    //ข้อ1
    public static double hypotenuse(double side1, double side2) {
        double hyPotenuse = 0;
        hyPotenuse = Math.pow(side1, 2) + Math.pow(side2, 2); //เก็บค่าผลรวมของ side1ยกกำลัง2 + side2ยกกำลังสอง
        hyPotenuse = Math.sqrt(hyPotenuse); //ถอดสแควลูท

        return hyPotenuse;
    }

    //ข้อ2
    public static void morethanzero(int number) {
        boolean more = false;
        if (number > 0) {
            more = true;
            morethenzero(more);
        } else {
            more = false;
            morethenzero(more);  
        }
    }
    public static void morethenzero(boolean more){
        if (more = true) {
            System.out.println("more than zero");
        } else {
            System.out.println("more less or equal zero");
        }
    }

    //ข้อ3
    public static void vowel(String word) {
        boolean haveVowel = false;
        for (int i = 0; i < word.length(); i++) {
            if (word.charAt(i) == 'A' || word.charAt(i) == 'a' || // เช็คว่าตัวอักษรเป็น A หรือ a
                    word.charAt(i) == 'E' || word.charAt(i) == 'e' || // เช็คว่าตัวอักษรเป็น E หรือ e
                    word.charAt(i) == 'I' || word.charAt(i) == 'i' || // เช็คว่าตัวอักษรเป็น I หรือ i
                    word.charAt(i) == 'O' || word.charAt(i) == 'o' || // เช็คว่าตัวอักษรเป็น O หรือ o
                    word.charAt(i) == 'U' || word.charAt(i) == 'u') // เช็คว่าตัวอักษรเป็น U หรือ u
            {
                System.out.println("There is vowel");
                haveVowel = true;
                break;
            }else {
                haveVowel = false;
            }
        }
        if (haveVowel = false){
            System.out.println("There is vowel");
        }
    }

    //ข้อ4
    public static void calculator(int hour,int minute){
        if(minute > 0 ){ //เช็คว่ามีนาทีไหม
            hour += 1; //ถ้ามีให้ปัด+1ชม.
        }
        hour -= 1; //ตัดชั่วโมงแรกออก
        int price = hour * 30; //ชั่วโมง * ราคา
        System.out.println("Price = " + price);
    }

    //ข้อ5
    public static void sumOddNumber(int a,int b){
        int sum = 0;
        for (int i = a; i <= b ; i++){ //วนลูบตั้งแต่ a-b
            if(i % 2 != 0){ //เช็คว่า i เท่ากับเลขคี่ไหม
                sum += i; //บวกค่าลงในsum
            }
        }
        sumOddNumber(sum);
    }
    public static void sumOddNumber(int a){
        System.out.println("sum of odd : "+a);
    }
}
