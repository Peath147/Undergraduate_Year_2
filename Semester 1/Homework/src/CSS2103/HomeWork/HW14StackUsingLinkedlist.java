package CSS2103.HomeWork;

public class HW14StackUsingLinkedlist {
    public static void main(String[] args) {                                    //                                ----------------
        StackUsingLinkedlist stack = new StackUsingLinkedlist();                //      รูปแบบของ linked list ---> | Data | Addess |
        System.out.println("---Stack Using Linkedlist---");                     //                                ----------------
        stack.push("1");                                                      //     จะมีตัวแปรตัวนึงไว้เก็บค่า Addess ตัวแรกของ linked list
        stack.push("2");                                                      //     ในที่นี้ชื่อ Node
        stack.push(5);                                                        //              ------
        stack.display();                                                        //      Node = | null | ซึง Addess นี้จะชี้ไปที่ linked list ตัวแรก
        System.out.println("Stack pop : "+stack.pop());                         //              ------
        stack.display();                                                        //              --------        -----------
        System.out.println("Stack peek : "+stack.peek());                       //      Node = | @ad123 | ---> | 1 | null |
                                                                                //              --------        -----------
        QueueUsingLinkedListMain queue = new QueueUsingLinkedListMain();        //                                  @ad123
        System.out.println("\n---Queue Using Linkedlist---");                   //              ---------       ---------       -----------
        queue.enqueue(1);                                                  //       Node = | @ad123 | ---> | 1 | @2 | ---> | 3 | null |
        queue.enqueue(2);                                                  //               --------       ---------       ----------
        queue.enqueue(3);                                                  //                                 @ad123            @2
        queue.dequeue();                                                        //
        queue.dequeue();
        queue.dequeue();
    }
}

class StackUsingLinkedlist {                                                                    //  ทำ Stack ด้วย Linked list
                                                                                                //
    Node top; //สร้างตัวแปรโหลดไว้เก็บ addess ค่าบนสุดของ Stack                                         //  Stack คือ LIFO คือการเข้าหลังออกก่อน
                                                                                                //  รูปของ Stack คือ
    private class Node { //สร้างLinklist node                                                    //   -----               ----
        Object data; //ตัวแแปร Object ไว้เก็บข้อมูล                                                   //       |               |
        Node link; //ตัวแปรโหนดไว้เก็บ addess                                                       //       |---------------|
    }                                                                                           //       | data | Addess |  <--- TOP ค่า TOP จะชี้ตัวบนสุดของ stack เสมอ
                                                                                                //       |---------------|
    StackUsingLinkedlist()                                                                      //
    {                                                                                           //
        this.top = null; //กำหนดค่าว่าค่าบนสุดเป็น null                                               //
    }                                                                                           //
                                                                                                //
    public void push(Object x) { //push สำหรับ push ข้อมูลเข้าไปในstack                              //      ---Stack push---
        Node temp = new Node(); //สร้าง Linklist ไว้สำหรับเก็บข้อมูล stack (ทำการสร้างใหม่ทุกครั้งที่เรียกใช้)     //      stack.push("1");   (top = null;)                                 | stack.push("2");
        //แต่ละ linklist จะเก็บค่า2ค่าคือ data ที่ไว้เก็บข้อมูลและ link ไว้สำหรับลิ้งไปยัง linklist ก่อนหน้า          //     Node temp = new Node(); คือสร้าง linked list                        |  Node temp = new Node();
                                                                                                //                    ---------------                                   |                 ----------------
        //เช็คว่ามี linklist temp หรือไม่                                                             //     temp = @1 ---> |       |       |                                 |  temp = @2 ---> |       |       |
    //    if (temp == null) {                                                                   //                    ----------------                                  |                 ----------------
    //        System.out.print("\nHeap Overflow");                                              //                                    |       top = temp;               |                                 |         top = temp;
    //        return;                                                                           //       temp.data = x;               |       top = @1                  |  temp.data = x;                 |         top = @2
    //    }                                                                                     //                      ---------     |                                 |                  ----------     |
                                                                                                //      temp = @1 ---> | 1 |    |     |      ----            ----       |   temp = @2 ---> | 2 |    |     |      ----            ----
        temp.data = x; // นำข้อมูลที่จะ push เข้าไปใน linklist ล่าสุด                                    //                     ---------      |         |          |            |                  ---------      |         |----------|
        temp.link = top; // นำ addess บนสุดของข้อมูลไปใส่ใน temp.link หรือคือ                          //                                     |         |          |            |                                 |         | 2 | @1   | <--- top
        // นำเอา addess ของ linklist ก่อนหน้าไปใส่ในเก็บไว้ในlinklistล่าสุด                               //      temp.link = top;               |         |----------|            |  temp.link = top;               |         |----------|
        top = temp; //นำ addess ของ linklist ปัจจุบันไปเก็บไว้ในค่า top                                 //                      -----------    |         | 1 | null | <--- top   |                  ---------      |         | 1 | null |
        System.out.println("Stack push : " + x);                                                //       temp = @1 ---> | 1 | null |   |         |----------|            |  temp = @2 ---> | 2 | @1 |      |         |----------|
    }                                                                                           //                     ------------    |                                 |                 ----------      |

    public boolean isEmpty() {
        //เช็คว่า stack นี้ว่างไหม มีข้อมูลไหม
        return top == null;
    }

    public Object peek() {
        //เช็คว่า stack มีข้อมูลไหม ถ้ามี ให้return ข้อมูลบนสุด
        if (!isEmpty()) {
            return top.data;
        }
        else {
            System.out.println("Stack is empty");
            return -1;
        }
    }

    public Object pop(){                                                                               //  stack pop
        //นำค่าออกจาก Stack โดยต้องเช็คว่าใน stack นั้นมีข้อมูลไหม ถ้ามี                                            //   stack.pop()
        if (top == null) {                                                                             //                                                           to
            System.out.print("\nStack Underflow");                                                     //  Object x = top.data;   |    ----            ----      | ---> |    ----            ----
            return "";                                                                                 //  x = 2                  |        |----------|          | ---> |        |          |
        } else {                                                                                       //                         |        | 2 | @1   | <--- top | ---> |        |          |
            Object x = top.data; //นำข้อมูลของlinklist บนสุดไปใส่ในตัวแปร x เพื่อที่เราจะ return กลับไป             //  top = (top).link;      |        |----------|          | ---> |        |----------|
            top = (top).link; // นำ addess ที่อยู่ในค่าด้านบนสุดไปใส่ที่แทนที่ในค่าบนสุด                              //  top = @1               |        | 1 | null |          | ---> |        | 1 | null | <--- top
            // (addess ที่อยู่ในค่าด้านบน คือลิ้งที่อยู่ใน linklist บนสุด                                             //                         |        |----------|          | ---> |        |----------|
            // คือลิ้งของ linklist ก่อนหน้าเราเอาไปแทนเพื่อที่เราจะบอกว่า linklist ก่อนหน้าเป็น linklist ที่อยู่ด้านบนสุด)    //  return x;
            return x; // return ข้อมูลที่อยู่ในค่า x                                                          //
        }
    }

    public void display() {
        //ไว้สำหรับดูว่าค่าทั้งหมดใน stack มีอะไรบ้าง
        if (top == null) {
            System.out.printf("\nStack Underflow");
        }
        else {
            Node temp = top; //สร้าง temp ขึ้นว่าไว้สำหรับเก็บค่า บนสุดของข้อมูล
            System.out.print("Stack : ");
            while (temp != null) { //ลูปจนกว่าค่า temp จะเป็น null
                System.out.print(temp.data + " "); // print ข้อมูลที่อยู่ใน temp
                temp = temp.link; //นำ addess ลี่อยู่ใน tempตอนนี้ ใส่ temp ใหม่เพื่อที่เราจำเอา linklist ถัดไปมา print
            }                     //เช่นตอนนี้ temp addess @tm001 ค่าใน temp มี (data 1,link @tm002)
                                  // เราก็นำค่า @tm002 ไปใส่แทนที่ temp เพื่อเราจะเอาข้อมูลใน @tm002 ไป print ต่อ
            System.out.println();
        }
    }
}

class QueueUsingLinkedListMain {
    private Node front, rear;
    private int currentSize;

    private class Node {
        Object data;
        Node next;
    }

    public QueueUsingLinkedListMain() {
        front = null; //ไว้เก็บ linklist แรกสุด
        rear = null; // เก็บ linklist ถัดไป
        currentSize = 0; // ขนาดเริ่มต้นของ queue = 0
    }

    public boolean isEmpty() {
        return (currentSize == 0);
    }

    public void enqueue(Object data) { //นำเข้าข้อมูล                                                           //   queue ebqueue
        Node oldRear = rear; //นำ addess ของ linklist ก่อนหน้าใส่ oldrear                                       //
        rear = new Node(); //สร้าง linklist                                                                   //    front = @1
        rear.data = data; //นำข้อมูลใส่ลง linklist                                                              //      ------------        -----------
        rear.next = null; //กำหนดค่าถัดไปเป็น null ก็คือlinklist นี้ยังไม่มีค่าถัดไป                                      //     |   1   | @2 | ---> | 2  | null |
                                                                                                            //      -------------       ------------
        if (isEmpty()) { //ถ้า Queue ว่างให้นำ linklist นี้ไปใส่ไว้ในค่า front คือค่า linklist ตัวแรกสุด                   //---------------------------------------------------
            front = rear;                                                                                   //
        } else {                                                                                            //      ----------------
            oldRear.next = rear; // ถ้า queue มีข้อมูลอยู่แล้วให้นำ addess linklist                                  //     |   1   |  @2   |   oldrear = @1
        }                       // นี้ไปใส่ไว้ใน next ของ linklist ก่อนหน้าให้รู้ว่า linklist นี้มาหลัง linklist ก่อนหน้่า    //      ----------------
                                                                                                           //
        currentSize++; //เพิ่ม size                                                                          //       ----------------
        System.out.println(data + " added to the queue");                                                  //       |   2   | null |   rear = @2
    }                                                                                                      //       ----------------


    public Object dequeue() { //นำข้อมูลออก                                                                  //     queue dequeue
        Object data = front.data; //นำค่าใน linklist แรกสุดไปเก็บไว้ใน data                                      //
        front = front.next; // นำ addess ของ linklist ถัดไปมาแทนที่ linklist แรก                              //      Object data = front.data;
        if (isEmpty()) {   // แต่ถ้าไม่มี linklist แล้วให้ใส่เป็นค่า null                                            //      data = 2
            rear = null;                                                                                  //
        }                                                                                                 //       front = front.next;
        currentSize--; //ลดขนาด size ของ queue                                                            //        front = @2
        System.out.println(data + " removed from the queue");                                             //      ------------        -----------
        return data;                                                                                     //      |   1   | @2 | ---> | 2  | null |
    }                                                                                                    //      -------------       ------------
}                                                                                                        //
