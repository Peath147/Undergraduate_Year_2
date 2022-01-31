package CSS2103.HomeWork;

import java.util.Scanner;

public class HW13InfixToPosfix {
    public static void main(String[] args) {
        Scanner in = new Scanner(System.in);

        System.out.print("Enter Infix : ");
        String x = in.next(); // รับค่า ตัวอักษร

        System.out.println(infixToPostFix(x)); // นำ infix ไปทำเป็น posfix โดยใช้ method infixToPostFix
    }

    public static String infixToPostFix(String expression){

        String result = ""; // result เอาไว้รัวคำที่เรียงเสร็จแล้วไว้รีเทินค่าที่แปลง infix เป็น posfixเสร็จ
        Stack2 stack = new Stack2(); // สร้าง stack
        for (int i = 0; i <expression.length() ; i++) { // ลูปเท่ากับจำนวนตัวอักษรเพื่อไปเทียบที่ละตัว
            char c = expression.charAt(i); // นำตัวอักษรมาเก็บตัวที่ c

            if(precedence(c)>0){ // เทียบว่าตัวอักษรมีค่ามากหรือน้อยกว่า 0 ( +,- มีค่า 1 | *,/ มีค่า 2 | ^ มีค่า 3 | ตัวอักษร a-z มีค่า -1 ) โดยเช็คจาก method precedence
                while(stack.isEmpty()==false && precedence(stack.peek())>=precedence(c)){ //ถ้าค่ามากกว่า 0 ให้ดูว่า stack ว่างไหม และค่าน้อยกว่าค่าก่อนหน้านี้ไหม
                    result += stack.pop(); //ถ้าค่ามากกว่าให้นำค่าที่มากกว่าออกมาใส่ result อย่าง ค่าที่เอามาเช็คคือ + ค่าบนสุดในstackคือ * ก็ให้นำ * ไปใส่ใน result
                }
                stack.push(c); //แล้วนำ + ไปใส่ stack

            }else if(c==')'){  //เช็คว่าเป็นวงเล็บปิด')' ไหมถ้าใช่ให้ pop ค่าออกแล้วนำไปใส่ result จนกว่าจะถึง วงเล็บเปิด'('
                char x = stack.pop(); // x เอาไว้เก็บค่า pop
                while(x!='('){ // วนลูปจนกว่าจะถึงวงเล็บเปิด '('
                    result += x; // เก็บค่าที่ pop ออกมาใส่ result
                    x = stack.pop(); // x เอาไว้เก็บค่า pop // ที่ต้องเอาpopมาไว้ล่างสุดเพราะเราเช็คว่าเป็นวงเล็บไหมด้วยการpopออกจะได้เอาวงเล็บเปิดออกไปด้วย'('
                }

            }else if(c=='('){ // ถ้าเป็นวงเล็บเปิดให้ push ค่าลงไปใน stack
                stack.push(c); // push ลง stack

            }else{
                result += c; // ถ้าไม่เข้าเงือนไขใดๆเลย ก็ค่าพวกตัวอักษร(a-z) ให้นำไปใส่ลงใน result เลย
            }
        }

        //เมื่อวนลูปครบทุกตัวอักษรแล้วให้มาทำการเช็คว่าเหลือกี่ตัวใน stack แล้วให้นำค่าใน stack ออกมาใส่ result ให้หมด
        for (int i = 0; i <= stack.getCount() ; i++) { // เช็คว่าเหลือกี่ตัวแล้วลูปตามจำนวนตัวที่เหลือ
            result += stack.pop(); // pop ค่าออกมาใส่ result
        }
        return result; // ส่งค่า result กลับไป
    }

    static int precedence(char c){ // ไว้สำหรับเช็คค่าว่า + - * / ^ มีลำดับความสำคัญเท่าไหร่
        switch (c){
            case '+': // +
            case '-': // -
                return 1; // +,- มีค่า 1
            case '*': // *
            case '/': // /
                return 2; // *,/ มีค่า 2
            case '^': // ^
                return 3; // ^ มีค่า 3
        }
        return -1; //ถ้าเป็นตัวอักษรหรือวงเล็บมีค่า -1
    }
}

class Stack2 {
    static int count = 0; // สร้างตัวแปร count ไว้สำหรับนับว่ามีค่าใน stack เท่าไหร่
    static final int MAX = 1000; // สร้างตัวแปร MAX ไว้เก็บค่าว่าจำให้ stack มีค่าขนาดเท่าไหร่
    int top; // สร้างตัวแปรที่ไว้เป็นตัวชี้ค่าบนสุดของ stack
    char a[] = new char[MAX]; // สร้าง array ไว้ทำ stack ให้มีค่าขนาดตามตัวแปร MAX

    boolean isEmpty(){ //คำสั่งที่ไว้เช็คว่า stack มีค่าข้างในหรือไม่ โดยเช็คว่าค่าใน stack มีค่าต่ำกว่า 0 หรือไม่ (ค่าเริ่มต้นของ stack คือ -1 ) ถ้าใช่ให้คือค่าว่า true ถ้าไม่คืนค่า false
        return (top < 0);
    }
    Stack2(){
        top = -1;
    }
    boolean push(char x){ // push คือ การนำค่าเข้า stack
        if (top >= (MAX - 1)){ // เช็คว่าตัวชี้ค่าบนสุด(top) มีค่ามากกว่าคือเท่ากับค่า 999(อ่านบรรทัดถัดไปว่ามายังไง) หรือค่าที่มากที่สุดหรือไม่ ถ้ามากกว่าหรือเท่ากับให้แสดงค่า stack overflow คือ stack เต็มแล้วไม่สามารถเพิ่มได้
            System.out.println("Stack Overflow"); // * (999 คือ ค่า MAX-1 คือ เราสร้าง stack ขนาด 1000(MAX) ถ้าเราจะเช็คค่าสุดท้ายเราต้องเอาจำนวนที่สร้างมาลบด้วย 1 )
            return false; // return ค่าว่า false
        }
        else { // ถ้าเช็คแล้วไม่มากกว่าหรือเท่ากับ 999 ให้ทำการเอา ตัวชี้ค่าบนสุด(top) + ด้วย 1 เพื่อให้ชี้ค่าว่างค่าถัดไปแล้วใส่ค่าที่ต้องการใส่เข้าไป
            a[++top] = x;
            count++; // + ค่า count เพิ่มขึ้นทุกครั้งที่ push
            System.out.println(x + " pushed into stack"); // สมมุติเราใช้คำสั่ง s2.push(10); คือจะบวก ตัวชี้ค่าบนสุด(top) + 1 แล้วใส่ค่าในข่องว่างช่องถัดไป
            return true; // return ค่าว่า true
        }
    }
    char pop(){ // pop คือ การนำค่าออกจาก stack
        if(top < 0){  // เช็คว่าค่า stack ต่ำกว่า 0 หรือไม่ ที่เช็คเพราะว่า ถ้า stack ต่ำกว่า 0 หรือก็คือ -1 มันเป็นค่าต่ำสุดไม่สามารถนำอะไรออกจาก stack ได้แล้ว
            System.out.println("Stack Underflow");
            return ' '; // return ค่าเป็น 0 เพราะไม่สามารถนำค่าออกได้แล้วเพราะไม่มีค่าอะไรแล้ว
        }else { // ถ้าค่ามากกว่า 0 ให้ทำการนำค่าที่ ตัวชี้ค่าบนสุด(top) มาเก็บที่ x แล้ว นำตัวชี้วัดลงมาที่น่าถัดไปโดยการ -1
            char x = a[top--];
            count--; // + ค่า count ลดค่าทุกครั้งที่ pop
            return x; // return ค่า x ที่ได้จากการ pop
        }
    }
    char peek(){ // peek คือการเช็คค่าบนสุด ที่ตัวชี้ค่าบนสุด(top) ชี้อยู่ โดยการเช็คก่อนว่าในตอนนี้มีค่าใน stack ไหมโดยการ top < 0 เช็คแบบเดียวกับ pop ว่าตอนนี้มีค่าหรือไม่
        if (top < 0){
            System.out.println("Stack Underflow");
            return '0'; // ถ้าไม่มีค่าใดๆใน stack ให้คืนค่าเป็น 0
        }else {
            char x = a[top]; // ให้นำค่าใน stack ที่ตัวชี้ค่าบนสุด(top)กำลังชี้อยู่ไปใส่ไว้ในค่า x
            return x; // คือค่า x ที่ได้จากค่าบนสุดใน stack
        }
    }
    int getCount(){ // คือคำสั่งที่ไว้คืนค่า count ที่ไว้นับว่าตอนนี้ใน stack มีกี่ตัว
        return count; // return ค่า count
    }
}

