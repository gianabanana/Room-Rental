#ifndef LOGIN_H
#define LOGIN_H

#include <QWidget>

namespace Ui {
class Login;
}

class Login : public QWidget
{
    Q_OBJECT

public:
    explicit Login(QWidget *parent = 0);
    ~Login();
    QString username;
    QString password;
    void storedInfo();
    void delay(int seconds);

private slots:
    void on_lineEditUser_textChanged(const QString &arg1);

    void on_lineEditPass_textChanged(const QString &arg1);

    void on_pushButtonLogin_clicked();


private:
    Ui::Login *ui;
    QString storedUser;
    QString storedPass;
};

#endif // LOGIN_H
