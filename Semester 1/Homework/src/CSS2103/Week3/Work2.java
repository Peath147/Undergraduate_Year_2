package CSS2103.Week3;

import java.util.*;

public class Work2 {

    //ให้เขียนโปรแกรม ทำการรับค่า ขนาดของ array เข้ามา จาก keyboard และ
    //1. ทำการสุ่มค่า 1-50    2. ทำการคำนวณหา ผลรวม 3. ค่าที่ น้อยที่สุด
    public static void main(String[] args) {

        Scanner in = new Scanner(System.in); //สร้างคำสั่งรับค่า

        int size; //สร้างตัวแปร size ไว้สำหรับกำหนดขนาด array

        System.out.print("Enter size of array : "); //แสดงคำ "Enter size of array"
        size = in.nextInt(); //รับค่า size

        int array[] = new int[size]; //สร้าง array ใหม่(กำหนดขนาดโดยตัวแปร size)

        for (int i = 0 ; i < array.length ; i++){ //วนลูปเท่ากับขนาดของ array
            array[i] = (int)(1+Math.random()*50); //สุ่มค่าใส่ array ในแต่ละตำแหน่ง
        }

        System.out.println("element of array : " + Arrays.toString(array)); //ปริ้นค่าใน array โดยใช้คำสั่ง Arrays.toString คือการแปลงค่า array ให้เป็น String เพื่อปริ้น
        System.out.println("sum : " + sumArray(array)); //เรียกใช้ method sumArray
        System.out.println("min : " + min(array)); //เรียกใช้ method min

    }

    public static int sumArray(int[] x){ //method sumArray
        int sum = 0; //สร้างตัวแปร sum
        for (int i = 0 ; i < x.length ; i++){ //วนลูปเท่ากับขนาดของ array
            sum += x[i]; //บวกค่าลงไปใน sum โดย += คือ sum = sum + x[i] คือการเอาตัวมันเองมาบวกค่าใน Array ในตอนนั้นแล้วเก็บค่า *** x[i] คือค่าarrayที่เราสุ่มตัวเลขส่งมาที่ method นี้
        }
        return sum; //ส่งค่า sum กลับไป(ค่าผลรวม)
    }

    public static int min(int[] x) { //method min
        int min = 50; //กำหนดค่าตัวแปล min ไว้เทียบหาค่าต่ำที่สุด ที่ตั้งไว้50เพราะเราจะค่าสูงสุดที่หาได้คือ 50 เลยตั้งไว้เผื่อที่จะเทียบเพื่อหาค่าที่ต่ำกว่าได้
        for (int i = 0; i < x.length; i++) { //วนลูปเท่ากับขนาดของ array
            if (x[i] <= min) { //เทียบค่า x[i] กับค่า min ว่าค่า x[i] ต่ำกว่าค่า min หรือไม่   *** x[i] คือค่าarrayที่เราสุ่มตัวเลขส่งมาที่ method นี้
                min = x[i]; //แทนค่า x[i] ลงใน min เพื่อนำไปเทียบค่าถัดไป
            }
        }
        return min; //ส่งค่า min กลับไป(คือค่าที่ต่ำที่สุดจากที่เทียบมา)
    }
}
