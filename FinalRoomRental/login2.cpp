#include "login2.h"
#include "ui_login2.h"
#include "rents.h"

Login2::Login2(QWidget *parent) :
    QWidget(parent),
    ui(new Ui::Login2)
{
    ui->setupUi(this);
    QPixmap pix("C:/Users/GianFrancesSacay/Desktop/RoomRental/RoomRental/images/aaa");
    ui->label_2->setPixmap(pix);
    ui->lineEditPass->setEchoMode(QLineEdit::Password);
    ui->tableView->hide();
    loadDatabase();
    db=QSqlDatabase::database();
}

Login2::~Login2()
{
    delete ui;
}

void Login2::loadDatabase()
{
    QSqlTableModel *model=new QSqlTableModel();
    model->setTable("addboarder");
    model->select();
    ui->tableView->setModel(model);
}

void Login2::delay(int seconds)
{
    QTime delayTime=QTime::currentTime().addSecs(seconds);
    while(QTime::currentTime()<delayTime){
        QCoreApplication::processEvents(QEventLoop::AllEvents, 1);
    }
}

void Login2::on_pushButtonLogin_clicked()
{
    QSqlTableModel *model=new QSqlTableModel(this);
    QSqlQuery query;
    model->setTable("addboarder");
    Username=ui->lineEditUser->text();
    qDebug()<<Username;
    qDebug()<<Password;
    Password=ui->lineEditPass->text();
    QString begin="Username='";
    QString end="'";
    begin.append(Username);
    begin.append(end);
    model->setFilter(begin);
    model->select();
    qDebug()<< query.lastError();
    ui->tableView->setModel(model);

    QString iD=ui->tableView->model()->data(ui->tableView->model()->index(0, 0)).toString();
    eID=iD.toInt();
    storedUsername=ui->tableView->model()->data(ui->tableView->model()->index(0, 12)).toString();
       if(Username==storedUsername){
           qDebug()<<"Username found!";
           qDebug()<<eID;
           storedPassword=ui->tableView->model()->data(ui->tableView->model()->index(0, 13)).toString();
           if(Password==storedPassword){
               ui->comment->setText("Credentials accepted!");
               delay(1);

               Profile *profile = new Profile(Username, Password, db);
               this->hide();
               profile->show();
           } else{
               ui->comment->setText("Invalid Password!");
           }
       } else{
           ui->comment->setText("Invalid username!");
       }
}

void Login2::on_pushButtonClickHere_clicked()
{
    CreateUser *create=new CreateUser;
    this->hide();
    create->show();
}
