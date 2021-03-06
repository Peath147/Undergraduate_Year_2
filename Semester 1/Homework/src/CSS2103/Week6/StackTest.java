package CSS2103.Week6;

public class StackTest {
    public static void main(String[] args) {
        Stack s = new Stack(); // สร้าง stack ชื่อ s
        s.push(10); // นำค่า 10 เข้าไปใน stack s
        s.push(20); // นำค่า 20 เข้าไปใน stack s
        s.push(30); // นำค่า 30 เข้าไปใน stack s
        System.out.println(s.pop() + " Popped from stack"); //นำค่าที่ใส่เข้าไปใน stack s ล่าสุดออกมาแล้ว print

        Stack s2 = new Stack(); // สร้าง stack ชื่อ s2
        s2.push(10); // นำค่า 10 เข้าไปใน stack s2
        s2.push(20); // นำค่า 20 เข้าไปใน stack s2
        s2.push(30); // นำค่า 30 เข้าไปใน stack s2
        s2.push(40); // นำค่า 40 เข้าไปใน stack s2
        System.out.println(s2.pop() + " Popped from stack"); // นำค่าที่ใส่เข้าไปใน stack s ล่าสุดออกมาแล้ว print
        System.out.println(s2.getCount()); // สร้าง stack ชื่อ s2
    }
}
class Stack {
    static int count = 0; // สร้างตัวแปร count ไว้สำหรับนับว่าสร้าง stack กี่อันแล้ว
    static final int MAX = 1000; // สร้างตัวแปร MAX ไว้เก็บค่าว่าจำให้ stack มีค่าขนาดเท่าไหร่
    int top; // สร้างตัวแปรที่ไว้เป็นตัวชี้ค่าบนสุดของ stack
    int a[] = new int[MAX]; // สร้าง array ไว้ทำ stack ให้มีค่าขนาดตามตัวแปร MAX

    boolean isEmpty(){ //คำสั่งที่ไว้เช็คว่า stack มีค่าข้างในหรือไม่ โดยเช็คว่าค่าใน stack มีค่าต่ำกว่า 0 หรือไม่ (ค่าเริ่มต้นของ stack คือ -1 ) ถ้าใช่ให้คือค่าว่า true ถ้าไม่คืนค่า false
        return (top < 0);
    }
    Stack(){
        count++; // + ค่า count เพิ่มขึ้นทุกครั้งที่เรียก new stack
        top = -1;
    }
    boolean push(int x){ // push คือ การนำค่าเข้า stack
        if (top >= (MAX - 1)){ // เช็คว่าตัวชี้ค่าบนสุด(top) มีค่ามากกว่าคือเท่ากับค่า 999(อ่านบรรทัดถัดไปว่ามายังไง) หรือค่าที่มากที่สุดหรือไม่ ถ้ามากกว่าหรือเท่ากับให้แสดงค่า stack overflow คือ stack เต็มแล้วไม่สามารถเพิ่มได้
            System.out.println("Stack Overflow"); // * (999 คือ ค่า MAX-1 คือ เราสร้าง stack ขนาด 1000(MAX) ถ้าเราจะเช็คค่าสุดท้ายเราต้องเอาจำนวนที่สร้างมาลบด้วย 1 )
            return false; // return ค่าว่า false
        }
        else { // ถ้าเช็คแล้วไม่มากกว่าหรือเท่ากับ 999 ให้ทำการเอา ตัวชี้ค่าบนสุด(top) + ด้วย 1 เพื่อให้ชี้ค่าว่างค่าถัดไปแล้วใส่ค่าที่ต้องการใส่เข้าไป
            a[++top] = x;
            System.out.println(x + " pushed into stack"); // สมมุติเราใช้คำสั่ง s2.push(10); คือจะบวก ตัวชี้ค่าบนสุด(top) + 1 แล้วใส่ค่าในข่องว่างช่องถัดไป
            return true; // return ค่าว่า true
        }
    }
    int pop(){ // pop คือ การนำค่าออกจาก stack
        if(top < 0){  // เช็คว่าค่า stack ต่ำกว่า 0 หรือไม่ ที่เช็คเพราะว่า ถ้า stack ต่ำกว่า 0 หรือก็คือ -1 มันเป็นค่าต่ำสุดไม่สามารถนำอะไรออกจาก stack ได้แล้ว
            System.out.println("Stack Underflow");
            return 0; // return ค่าเป็น 0 เพราะไม่สามารถนำค่าออกได้แล้วเพราะไม่มีค่าอะไรแล้ว
        }else { // ถ้าค่ามากกว่า 0 ให้ทำการนำค่าที่ ตัวชี้ค่าบนสุด(top) มาเก็บที่ x แล้ว นำตัวชี้วัดลงมาที่น่าถัดไปโดยการ -1
            int x = a[top--];
            return x; // return ค่า x ที่ได้จากการ pop
        }
    }
    int peek(){ // peek คือการเช็คค่าบนสุด ที่ตัวชี้ค่าบนสุด(top) ชี้อยู่ โดยการเช็คก่อนว่าในตอนนี้มีค่าใน stack ไหมโดยการ top < 0 เช็คแบบเดียวกับ pop ว่าตอนนี้มีค่าหรือไม่
        if (top < 0){
            System.out.println("Stack Underflow");
            return 0; // ถ้าไม่มีค่าใดๆใน stack ให้คืนค่าเป็น 0
        }else {
            int x = a[top]; // ให้นำค่าใน stack ที่ตัวชี้ค่าบนสุด(top)กำลังชี้อยู่ไปใส่ไว้ในค่า x
            return x; // คือค่า x ที่ได้จากค่าบนสุดใน stack
        }
    }
    int getCount(){ // คือคำสั่งที่ไว้คืนค่า count ที่ได้จากการ + เพิ่มทุกๆครั้งที่ สร้าง stack ใหม่(new stack)
        return count; // return ค่า count
    }
}
