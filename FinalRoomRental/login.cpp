#include "login.h"
#include "ui_login.h"
#include "rents.h"

Login::Login(QWidget *parent) :
    QWidget(parent),
    ui(new Ui::Login)
{
    ui->setupUi(this);
    QPixmap pix("C:/Users/GianFrancesSacay/Desktop/RoomRental/RoomRental/images/aaa");
    ui->label_2->setPixmap(pix);
    storedInfo();
    ui->lineEditPass->setEchoMode(QLineEdit::Password);
}

Login::~Login()
{
    delete ui;
}

void Login::storedInfo()
{
    storedUser="admin";
    storedPass="password";
}

void Login::delay(int seconds)
{
    QTime delayTime=QTime::currentTime().addSecs(seconds);
    while(QTime::currentTime()<delayTime){
        QCoreApplication::processEvents(QEventLoop::AllEvents, 1);
    }
}

void Login::on_lineEditUser_textChanged(const QString &arg1)
{
    username=arg1;
    qDebug()<<username;
}

void Login::on_lineEditPass_textChanged(const QString &arg1)
{
    password=arg1;
    qDebug()<<password;
}

void Login::on_pushButtonLogin_clicked()
{
    qDebug()<<"entered:"<<username;
    qDebug()<<"stored:"<<storedUser;
    qDebug()<<"entered:"<<password;
    qDebug()<<"stored:"<<storedPass;

    if(username==storedUser){
        qDebug()<<"matched";
        if(password==storedPass){
            qDebug()<<"matched";
            ui->comment->setText("Credentials accepted!");
            delay(1);

            Rents *mainWindow=new Rents();
            this->hide();
            mainWindow->show();
        } else{
            ui->comment->setText("Invalid password!");
        }
    } else{
        ui->comment->setText("Invalid username!");
    }
}
