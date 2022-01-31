package CSS2103.Week1;

import java.util.*;

public class homework {
    public static void main(String[] args) {
        Scanner in = new Scanner(System.in); //สร้างคำสั่งสำหรับรับเข้าข้อมูล
        Random rand = new Random(); //สร้างคำสั่งสำหรับสุ่มตัวเลข
        int fill,ranndom; //สร้างตัวแปลสำหรับเก็บค่าที่รับเข้ามากับต่าตัวเลขที่สุ่มได้

        do {
            ranndom = rand.nextInt(25)+1; //สุ่มตัวเลขระหว่างตำแหน่งที่ 0-25 แล้วบวกหนึ่งเพราะอาเรย์เริ่มจาก0
            System.out.print("Enter number : "); //แสดงค่า Enter number
            fill = in.nextInt(); //รับค่าตัวเลขแล้วเอาเข้ามาเก็บใน fill

            if (fill > ranndom) { //เป็นการเทียบค่าที่เรากรอกกับที่สุ่มถ้าเป็นจริงจะทำบรรทัดล่าง(กรอกมากกว่าสุ่ม)
                System.out.println("Your guess is too high"); //ถ้าเป็นจริงจะแสดงค่า your guess is too high
            } else if (fill < ranndom) { //เป็นการเทียบค่าที่เรากรอกกับที่สุ่มถ้าเป็นจริงจะทำบรรทัดล่าง(กรอกน้อยกว่าสุ่ม)
                System.out.println("Your guess is too low"); //ถ้าเป็นจริงจะแสดงค่า Your guess is too low
            }
        }while (fill != ranndom); //ถ้าค่าที่เรากรอกลงไปกับสุ่มไม่เท่ากันให้ทำซ้ำโปรแกรมอีกรอบ แต่ถ้าเท่ากันให้จบโปรแกรม
    }
}

