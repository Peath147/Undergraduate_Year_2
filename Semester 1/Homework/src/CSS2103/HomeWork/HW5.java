package CSS2103.HomeWork;

import java.util.*; //import ชุดคำสั่ง

public class HW5 {
    public static void main(String[] args) {
        Scanner in = new Scanner(System.in); //สร้างคำสั่งสำหรับรับเข้าข้อมูล
        Random rand = new Random(); //สร้างคำสั่งสำหรับสุ่มตัวเลข
        int num,rNumber; //สร้างตัวแปลสำหรับเก็บค่าที่รับเข้ามากับต่าตัวเลขที่สุ่มได้

    do {
        rNumber = rand.nextInt(25)+1; //สุ่มตัวเลขระหว่าง 1-26 แล้วเก็บค่าใน rNumber
        System.out.print("Enter number : "); //แสดงค่า Enter number
        num = in.nextInt(); //รับค่าตัวเลขมาเก็บใน num

        if (num > rNumber) { //เทียบว่าค่า num มากกว่าค่า rNumber ไหม
            System.out.println("Your guess is too high"); //ถ้ามากกว่าแสดงค่า your guess is too high
        } else if (num < rNumber) { //เทียบว่าค่า num น้อยกว่าค่า rNumber ไหม
        System.out.println("Your guess is too low"); //ถ้าน้อยกว่าแสดงค่า Your guess is too low
            }
        }while (num != rNumber); //ถ้าค่า num กับค่า rNumber ไม่เท่ากันให้ทำซ้ำโปรแกรมอีกรอบ แต่ถ้าเท่ากันให้จบโปรแกรม
    }
}
